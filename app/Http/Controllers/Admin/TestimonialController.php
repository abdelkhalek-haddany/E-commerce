<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class TestimonialController extends Controller
{
    // the curd controller for testimonials form


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    
    public function index(){
        $testimonials = Testimonial::orderBy('id','desc')->get();
        if($testimonials)
        return view('admin.testimonials.index')->with('testimonials',$testimonials);
     
        return redirect()->route('admin.dashboard')->with(['error' => __('admin/messages.error')]);
    }

    public function create(){
        return view('admin.testimonials.create');
    }

    // the sort function for insert the testimonials in database
    public function store(StoreTestimonialRequest $request){


        try{
        $testimonial = new Testimonial();
        $testimonial->name=$request->name;
        $testimonial->job = $request->job;
        $testimonial->facebook = $request->facebook;
        $testimonial->opinion = $request->opinion;
        $testimonial->created_at = now();
        $testimonial->save();

        return redirect()->route('testimonials.index')->with(['success' => __('admin/messages.saved')]);
    } catch (\Exception $ex) {
        return redirect()->route('testimonials.index')->with(['error' => __('admin/messages.error')]);
    }
    }

    // testimonial edit page
    public function edit($id)
    {
        $testimonial = Testimonial::where('id',$id)->get()->first();
        if($testimonial)
        return view('admin.testimonials.edit', compact('testimonial'));
        return redirect()->route('admin.dashboard')->with(['error' => __('admin/messages.error')]);

    }


    // update testimonials

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial){

        try{
        $testimonial->name=$request->name;
        $testimonial->job = $request->job;
        $testimonial->facebook = $request->facebook;
        $testimonial->opinion = $request->opinion;
        //$testimonial->updated_at = now();
        $testimonial->update();
        return redirect()->route('testimonials.index')->with(['success' => __('admin/messages.updated')]);
    } catch (\Exception $ex) {
        return redirect()->route('testimonials.index')->with(['error' => __('admin/messages.error')]);
    }
    }

    // delete function for delete the message in database

    public function destroy($id){
        $Testimonials = Testimonial::find($id);
        if(!$Testimonials){
            return redirect()->route('testimonials.index')->with(['error' => __('admin/messages.not_found')]);
        }else{
            $Testimonials->delete();
            return redirect()->route('testimonials.index')->with(['error' => __('admin/messages.deleted')]);

        }
    }

    public function details($id){
        $find = Testimonial::find($id);
        if(!$find) return back()->with('notfund','sorry this item not found');
        $testimonial = Testimonial::select('id','name','category','description','date','url','client','images')->find($id);
        return view('pages.testimonial_details')-> with('testimonial',$testimonial);
    }
}