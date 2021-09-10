<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\ChaptersRequest;

class ChaptersController extends Controller
{
    public function insertChapter(ChaptersRequest $request, $id){
        Chapter::create([
            'name' => $request->chapitre,
            'cours_id' => $id
        ]);

        return redirect()->back()->with("success", "Le chapitre a été ajouté avec succès");
    }

    public function updateChapter(ChaptersRequest $request, $id, $chapterID){
        $chapitre = Chapter::where([['cours_id', $id], ['id', $chapterID]])->first();
        $chapitre->update([
            'name' => $request->chapitre
        ]);

        return redirect()->back()->with("success", "Le chapitre a été mis à jour avec succès");
    }

    public function deleteChapter($id, $chapterID){
        $chapitre = Chapter::where([['cours_id', $id], ['id', $chapterID]])->first();
        $documents = Document::where('chapitre_id', $chapterID);
            foreach($documents->get() as $document){
                if($document->type === 'pdf'){
                    unlink(public_path('uploads/courses/files'). '/'. $document->document);
                }
            }
        $documents->delete();
        $chapitre->delete();

        return redirect()->back()->with("success", "Le chapitre a été supprimé avec succès");
    }
}
