<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class FileHandlerController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
            'numero' => 'required',
            'numpiece' => 'required',
            'fileName' => 'required',
            'type' => ['required', Rule::in(['article', 'bon', 'camion'])],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if ($file = $request->file('file')) {

            $numero = $request->numero;
            $numpiece = $request->numpiece;
//            if (Controller::checkPermissions($numpiece)) {
//                return response()->json(['message' => 'Unauthenticated'], 401);
//            }

            $fileName = $request->fileName;
            $type = $request->type;
            $extension = $request->file('file')->extension();

            //article
            if ($type == 'article') {
                $storePath = 'public/images' . '/' . $numpiece . '/' . $numero;
                $filePath = $file->storeAs($storePath, $fileName . '.' . $extension);
            }

            //camion
            if ($type == 'camion') {
                $storePath = 'public/images' . '/' . $numpiece;
                $filePath = $file->storeAs($storePath, 'camion' . '.' . $extension);
            }

            //bon
            if ($type == 'bon') {
                $storePath = 'public/images' . '/' . $numpiece;
                $filePath = $file->storeAs($storePath, 'bon' . '.' . $extension);
            }


            $originalName = $file->getClientOriginalName();

            return response([
                "success" => true,
                "message" => " File successfully uploaded ",
                "originalName" => $originalName,
                "path" => $filePath
            ], Response::HTTP_CREATED);

        }
    }

    public function getFilesInFolder(string $numpiece, string $numero)
    {
        $folderPathArticle = public_path('/storage/images/' . $numpiece . '/' . $numero);
        $folderPathCamion_bon = public_path('/storage/images/' . $numpiece);

        $fileDetails = [];

        if (File::isDirectory($folderPathArticle)) {
            $filesArticle = File::files($folderPathArticle);
            foreach ($filesArticle as $file) {
                $fileName = basename($file);
                $fileUrl = asset('images/' . $numpiece . '/' . $numero . '/' . $fileName);
                $fileDetails[] = $fileUrl;
            }
        }

        if (File::isDirectory($folderPathCamion_bon)) {
            $filesCamion_bon = File::files($folderPathCamion_bon);
            foreach ($filesCamion_bon as $file) {
                $fileName = basename($file);
                $fileUrl = asset('images/' . $numpiece . '/' . $fileName);
                $fileDetails[] = $fileUrl;
            }
        }

        return $fileDetails;
    }


    public function deleteImage(string $numpiece, string $numero, string $imgName)
    {

//        if (Controller::checkPermissions($numpiece)) {
//           return response()->json(['message' => 'Unauthenticated'], 401);
//        }

        $FolderPath = public_path('/storage/images/' . $numpiece . '/' . $numero . '/');

        if ($imgName == 'camion.jpg' || $imgName == 'bon.jpg') {
            $FolderPath = public_path('/storage/images/' . $numpiece . '/');
        }

        if (File::exists($FolderPath . $imgName)) {
            File::delete($FolderPath . $imgName);

            if (($imgName == 'c1_1.jpg') and File::exists($FolderPath . 'c1_2.jpg')) {
                File::move($FolderPath . 'c1_2.jpg', $FolderPath . $imgName);
            }

            if (($imgName == 'c2_1.jpg') and File::exists($FolderPath . 'c2_2.jpg')) {
                File::move($FolderPath . 'c2_2.jpg', $FolderPath . $imgName);
            }

            return response()->json(['message' => 'Image ' . $imgName . ' supprimée avec succès'], 200);
        } else {
            return response()->json(['message' => 'Image ' . $imgName . ' non trouvée'], 404);
        }


    }

}
