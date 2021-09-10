<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentsRequest;

class DocumentsController extends Controller
{

    public function insertFile(DocumentsRequest $request, $coursID){
        if($request->has('file')){
            $file = $request->file;
            $extension = $file->extension();
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/courses/files'), $file_name);
        }

        Document::create([
            "nom" => Str::ucfirst($request->filename),
            "type" => $extension,
            "document" => $file_name,
            "chapitre_id" => $request->chapitre,
            "cours_id" => $coursID
        ]);

        return redirect()->back()->with("success", "Le fichier a été ajouté avec succès");
    }

    public function updateFile(DocumentsRequest $request, $coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();
        if($request->has('file')){
            $file = $request->file;
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/courses/files'), $file_name);
            unlink(public_path('uploads/courses/files'). '/'. $document->document);
            $document->document = $file_name;
        }

        $document->update([
            "nom" => Str::ucfirst($request->filename),
            "type" => 'pdf',
            "document" => $document->document,
            "chapitre_id" => $request->chapitre
        ]);

        return redirect()->back()->with("success", "Le fichier a été mis à jour avec succès");
    }

    public function deleteFile($coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();
        unlink(public_path('uploads/courses/files'). '/'. $document->document);
        $document->delete();
        return redirect()->back()->with("success", "Le Fichier a été supprimé avec succès");
    }

    //  -------------------------- insert Video -------------------------

    public function insertVideo(DocumentsRequest $request, $coursID){

        Document::create([
            "nom" => Str::ucfirst($request->filename),
            "type" => "video",
            "document" => $request->file,
            "chapitre_id" => $request->chapitre,
            "cours_id" => $coursID
        ]);

        return redirect()->back()->with("success", "La video a été ajouté avec succès");
    }

    public function updateVideo(DocumentsRequest $request, $coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();

        $document->update([
            "nom" => Str::ucfirst($request->filename),
            "type" => "video",
            "document" => $request->file,
            "chapitre_id" => $request->chapitre,
        ]);

        return redirect()->back()->with("success", "La video a été mis à jour avec succès");
    }

    public function deleteVideo($coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();
        $document->delete();
        return redirect()->back()->with("success", "La video a été supprimé avec succès");
    }


    // ------------------------- insert Text --------------------------

    public function insertText(DocumentsRequest $request, $coursID){

        Document::create([
            "nom" => Str::ucfirst($request->filename),
            "type" => "text",
            "document" => $request->file,
            "chapitre_id" => $request->chapitre,
            "cours_id" => $coursID
        ]);

        return redirect()->back()->with("success", "Le texte a été ajouté avec succès");
    }

    public function updateText(DocumentsRequest $request, $coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();

        $document->update([
            "nom" => Str::ucfirst($request->filename),
            "type" => "text",
            "document" => $request->file,
            "chapitre_id" => $request->chapitre,
        ]);

        return redirect()->back()->with("success", "Le texte a été mis à jour avec succès");
    }

    public function deleteText($coursID, $id){
        $document = Document::where([['cours_id', $coursID],['id', $id]])->first();
        $document->delete();
        return redirect()->back()->with("success", "Le texte a été supprimé avec succès");
    }

}
