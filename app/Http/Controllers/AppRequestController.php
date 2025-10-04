<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationRequests;
use RealRashid\SweetAlert\Facades\Alert;
class AppRequestController extends Controller
{

    public function show(ApplicationRequests $applicationRequests) {
     //   $user_id = auth()->id();
      //  $requests = ApplicationRequests::where('user_id', $user_id)->with('job')->get();

      //  return view('jobseeker.manage', ['requests' => $requests]);

        $title = 'tets';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
       return view('jobseeker.manage', ['applicationRequests' => auth()->user()->applicationRequests()->with('job')->get()]);
    }


// Delete Application Request
    public function destroy(ApplicationRequests $applicationRequests , string $job_id) {
        // Make sure logged in user is owner

        $request = ApplicationRequests::where('user_id', auth()->id())->where('job_id', $job_id)->first();
        if (!$request) {
            abort(403, 'Unauthorized Action');
        }
          $request->delete();
          toast('تم ألغاء الطلب بنجاح!','success');
        return redirect('/jobseeker/manage');
    }




   // Store Listing Data
    public function store(Request $request , string $job_id) {



        $formFields['user_id'] = auth()->id();

        $formFields['job_id'] = $job_id;

        ApplicationRequests::create($formFields);

        return redirect('/')->with('message', 'Request created successfully!');
    }

}
