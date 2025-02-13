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
            // Store the image in the 'public/images' directory
            $imagePath = $request->file('image')->store('images', 'public');  // This saves the file with a unique name
        }

        $currentYear = Carbon::now()->year; // Get current year using Carbon
        $csrfToken = substr(md5($request->_token), 0, 8); // Hash the CSRF token (take the first 8 characters)
        $randomNumber = rand(1000, 9999); // Generate random 4-digit number
    
        // Combine them to form the unique application_id
        $applicationId = "{$currentYear}-{$csrfToken}-{$randomNumber}"; 

         
    
        // Store the application data in the applications table
        $application = new Application();
        $application->application_name = $validated['application_name'];
        $application->organization_type = $validated['organization_type'];
        $application->designation = $validated['designation'];
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
        if ($imagePath) {
            $application->image_path = $imagePath;  // Save the image path
        }
        // Save the application
        $application->save();


      //here we make the all the thing related to 
      foreach ($request->guest_name as $index => $guestName) {
        $guest = new Guest();
        $guest->application_id = $applicationId;  // Use the generated application ID
        $guest->guest_name = $guestName;
        $guest->organization = $request->organization[$index] ?? null;
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
    