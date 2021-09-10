<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Courses;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CoursesRequest;

class CoursesController extends Controller
{
    public function returnCourseBySlug($slug){
        return Courses::where('slug', $slug)->first();
    }

    public function index(){
        $courses = Courses::latest()->paginate(5);
        return view('admin.courses')->with([
            'courses' => $courses
        ]);
    }

    public function userIndex(){
        $courses = Courses::latest()->paginate(8);
        return view('courses')->with([
            'courses' => $courses
        ]);
    }

    public function show($slug){
        $Course = $this->returnCourseBySlug($slug);
        if(!$Course){
            abort(404);
        }
        $Courses = Courses::latest()->take(4)->get();
        $documents = Document::where('cours_id', $Course->id)->get();
        $chapitres = Chapter::where('cours_id', $Course->id)->get();
        return view('course')->with([
            'Course' => $Course,
            'Courses' => $Courses,
            'documents' => $documents,
            'chapitres' => $chapitres
        ]);
    }

    public function insert(CoursesRequest $request){
        if($request->has('image')){
            $image = $request->image;
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/courses'), $image_name);
        }

        Courses::create([
            "nom" => Str::ucfirst($request->nom),
            "slug" => Str::slug($request->nom),
            "enseignant" => Str::title($request->enseignant),
            "image" => $image_name
        ]);

        return redirect()->back()->with("success", "Le cours a été ajouté avec succès");
    }

    public function update(CoursesRequest $request,$id){
        $course = Courses::all()->find($id);
        if($request->has('image')){
            $image = $request->image;
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path('uploads/courses'), $image_name);
            unlink(public_path('uploads/courses'). '/'. $course->image);
            $course->image = $image_name;
        }

        $course->update([
            "nom" => Str::ucfirst($request->nom),
            "slug" => Str::slug($request->nom),
            "enseignant" => Str::title($request->enseignant),
            "image" => $course->image
        ]);

        return redirect()->back()->with("success" , "Le cours a été mis à jour avec succès");
    }

    public function delete($id){
        $course = Courses::all()->find($id);
        unlink(public_path('uploads/courses'). '/'. $course->image);
        $chapitres = Chapter::where('cours_id', $id)->get();
        $documents = Document::where('cours_id', $id)->get();
        foreach($documents as $document){
            if($document->type === 'pdf'){
                unlink(public_path('uploads/courses/files'). '/'. $document->document);
            }
            $document->delete();
        }
        foreach($chapitres as $chapitre){
            $chapitre->delete();
        }
        $course->delete();
        return redirect()->back()->with("success", "Le cours a été supprimé avec succès");
    }


    public function showCourse($id){
        $Course = Courses::where('id', $id)->first();
        if(!$Course){
            abort(404);
        }
        $documents = Document::where('cours_id', $id)->latest()->paginate(5);
        $chapitres = Chapter::where('cours_id', $id)->get();
        return view('admin.course')->with([
            'Course' => $Course,
            'documents' => $documents,
            'chapitres' => $chapitres
        ]);
    }
}
