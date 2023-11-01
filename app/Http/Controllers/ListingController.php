<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ListingController extends Controller
{
    // Get and show all listings
    public function index(Request $request)
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // post listing
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $factory = new Factory;
            $firebaseStorage = $factory->withServiceAccount(base_path('firebase_credentials.json'))->createStorage();
            $defaultBucket = $firebaseStorage->getBucket();
            $firebaseStoragePath = 'listing-images/' . $imageName;

            $imageStream = fopen($image->getRealPath(), 'r');

            if (is_resource($imageStream)) {
                try {
                    $defaultBucket->upload($imageStream, ['name' => $firebaseStoragePath]);
                } catch (\Exception $e) {
                    // Handle exceptions here, e.g., logging the error
                    Log::error("Error uploading to Firebase: " . $e->getMessage());
                }

                // Close the stream only if it's still open
                if (is_resource($imageStream)) {
                    fclose($imageStream);
                }
            } else {
                // Handle the error if the file couldn't be opened
                Log::error("Unable to open the image stream for reading.");
            }

            $defaultBucket->upload($imageStream, ['name' => $firebaseStoragePath]);
            fclose($imageStream);

            $formFields['images'] = $firebaseStoragePath;
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    // show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update listing data
    public function update(Request $request, Listing $listing)
    {
        // Ensure logged in user is owner

    if ($listing->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
    }

        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('listings/manage')->with('message', 'Listing updated successfully');
    }

    // Delete listing
    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

}
