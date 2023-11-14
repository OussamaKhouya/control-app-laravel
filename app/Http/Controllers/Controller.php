<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws ValidationException
     */
    public function checkPermissions($numpiece)
    {
        $cmds = Commande::where('bcc_nupi', $numpiece)->get();
        if (count($cmds) == 0) {
            return response()->json(['error' => 'pas de commande avec le numero ' . $numpiece], 200);
        }

        $isValid = $cmds->first()->bcc_val;
        $isAdmin = auth()->user()->role == "ADMIN";
        $isCon1 = auth()->user()->role == "CONTROL1";
        $isCon2 = auth()->user()->role == "CONTROL2";

       return (($isCon1 or $isCon2) and $isValid);
    }
}
