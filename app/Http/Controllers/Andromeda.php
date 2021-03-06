<?php
namespace App\Http\Controllers;

use App\Applicant\Applicant;
use Illuminate\Http\Request;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class Andromeda extends Controller {
    public function helpme(Request $request) {
        $token = (new Builder())->issuedBy(config('app.url'))// Configures the issuer (iss claim)
        ->canOnlyBeUsedBy(config('uiconfig.andromeda_url'))// Configures the audience (aud claim)
        ->issuedAt(time())// Configures the time that the token was issue (iat claim)
        ->canOnlyBeUsedAfter(time() - 50000)// Configures the time that the token can be used (nbf claim)
        ->expiresAt(time() + 50000); // Configures the expiration time of the token (nbf claim)
        
        $visitingApplicant = new Applicant();
        if ($visitingApplicant->isLoggedIn()) {
            $applicant = Applicant::current();
            $token->set('userdata', ['name' => $applicant['fname'] . ' ' . $applicant['lname'], 'id' => $applicant['citizen_id'], 'email' => $applicant['email'], 'Url' => url()->previous() ?? 'NULL']);
        }
        
        $token = $token->sign((new Sha256()), config('uiconfig.andromeda_key'))->getToken(); // Retrieves the generated token
        return redirect(config('uiconfig.andromeda_url') . '/helpme?attach=' . urlencode($token));
    }
    
}
