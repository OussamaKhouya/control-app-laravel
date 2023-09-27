<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class FileHandlerController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048|mimes:jpeg,bmp,png,gif,svg,jpg,pdf',
            'numero' => 'required',
            'numpiece' => 'required',
            'fileName' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if ($file = $request->file('file')) {

            $numero = $request->numero;
            $numpiece = $request->numpiece;
            $fileName = $request->fileName;
            $storePath = 'public/images' . '/' . $numpiece . '/' . $numero;
            $extension = $request->file('file')->extension();
            $filePath = $file->storeAs($storePath, $fileName . '.' . $extension);
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
        $folderPath = public_path('/storage/images/' . $numpiece . '/' . $numero);
        $files = File::files($folderPath);

        $fileDetails = [];
        foreach ($files as $file) {
            $fileName = basename($file);
            $fileUrl = asset('images/' . $numpiece . '/' . $numero. '/' . $fileName);
            $fileDetails[] = [
                'name' => $fileName,
                'url' => $fileUrl,
            ];
        }
        return $fileDetails;
    }


}
