<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Guest;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        $org=Organization::all();
        
        return view('welcome',compact('org'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'application_name' => 'required|string|max:255',
            'organization_type' => 'required|string',
            'organization' => 'nullable|exists:organizations,id', // Assuming organization table has an id
            'manual_organization' => 'nullable|string|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|digits:10',
            'email' => 'required|email',
            'purpose' => 'required|string',
            'date_of_arrival' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
            'date_of_departure' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'room' => 'required|integer',
            'payment' => 'required|string',
            'employee_id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            //validation for the guest
            'guest_name' => 'nullable|array',
            'guest_name.*' => 'required_with:guest_name|string|max:255',
            'organizations' => 'nullable|array',
            'organizations.*' => 'required_with:organizations|string|max:255',
            'age' => 'nullable|array',
            'age.*' => 'required_with:age|integer',
            'contact' => 'nullable|array',
            'contact.*' => 'required_with:contact|digits:10',
            'category' => 'nullable|array',
            'category.*' => 'required_with:category|string|in:VIP,General,Staff',
            'photo_id_proof' => 'nullable|array',
            'photo_id_proof.*' => 'required_with:photo_id_proof|string|max:255',
        ]);
    
        $imagePath = null;

        if ($request->hasFile('image')) {
            // Store the image in the 'public/uploads/bookingimages' directory
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/bookingimages'), $fileName);
            
            // Set the $imagePath to the relative path where the image is stored
            $imagePath = 'uploads/bookingimages/' . $fileName;
        }
        
        // Generate application_id using the CSRF token, current year, and a random 4-digit number
        $currentYear = Carbon::now()->year; // Get the current year using Carbon
        $randomNumber = rand(10000, 99999); // Generate random 5-digit number
        
        // Combine them to form the unique application_id
        $applicationId = "NBRI/{$currentYear}/{$randomNumber}";
        
        
        // Store the application data in the applications table
        $application = new Application();
        $application->application_name = $validated['application_name'];
        $application->application_id = $applicationId;
        $application->organization_type = $validated['organization_type'];
        $application->designation = $validated['designation'];
        $application->employee_id = $validated['employee_id'];
        $application->contact_no = $validated['contact_no'];
        $application->email = $validated['email'];
        $application->purpose = $validated['purpose'];
        $application->date_of_arrival = $validated['date_of_arrival'];
        $application->arrival_time = $validated['arrival_time'];
        $application->date_of_departure = $validated['date_of_departure'];
        $application->departure_time = $validated['departure_time'];
        $application->room = $validated['room'];
        $application->payment = $validated['payment'];
        
        // If organization is selected via organization_type, store the organization ID
        if ($validated['organization_type'] == 'CSIR' && $request->organization) {
            $application->organization_id = $validated['organization'][0];  // Storing the organization ID
        } elseif ($validated['organization_type'] == 'Non-CSIR' && $request->manual_organization) {
            $application->manual_organization = $validated['manual_organization'];  // Storing the manual organization name
        }
        
        // If imagePath is set, store the image path
        if ($imagePath) {
            $application->image_path = $imagePath;  // Save the image path
        }
        
        // Save the application data to the database
        $application->save();
        
    
        // Store guests data related to this application
        foreach ($request->guest_name as $index => $guestName) {
            $guest = new Guest();
            $guest->application_id = $applicationId;  // Use the application ID from the application table
            $guest->guest_name = $guestName;
            $guest->organization = $request->organizations[$index] ?? null;
            $guest->age = $request->age[$index];
            $guest->gender = $request->gender[$index];
            $guest->contact = $request->contact[$index];
            $guest->category = $request->category[$index];
            $guest->photo_id_proof = $request->photo_id_proof[$index];
            $guest->save();
        }
    
        // Redirect with a success message
        return redirect()->route('practise')->with('success', 'Application created successfully');
    }
    public function view(){
       return view('member');
    }

    public function detail(){
        return view('detail');
    }
    
}


// code for the member

