<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'userid' => 'required|unique:users,userid',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        // Create the user
        $user = new User();
        $user->userid = $request->input('userid');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('userid', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page
            if (Auth::user()->category == 'admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
        } else {
            // Authentication failed, set session error message
            return redirect()->back()->with('wrong', 'Invalid UserID or Password');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login'); // Redirect to the login page or home page
    }
    public function edit()
    {
        $locations = [
            'Johor' => [
                'Johor Bahru',
                'Muar',
                'Kulai',
                'Batu Pahat',
                'Kluang',
                'Segamat',
                'Pontian',
                'Tangkak'
            ],
            'Kedah' => [
                'Alor Setar',
                'Sungai Petani',
                'Kulim',
                'Langkawi',
                'Baling',
                'Kota Setar',
                'Pendang',
                'Kuala Kedah'
            ],
            'Kelantan' => [
                'Kota Bharu',
                'Kuala Krai',
                'Gua Musang',
                'Tumpat',
                'Machang',
                'Tanah Merah',
                'Jeli',
                'Pasir Mas'
            ],
            'Malacca' => [
                'Melaka City',
                'Ayer Keroh',
                'Jasin',
                'Klebang',
                'Sungai Udang',
                'Masjid Tanah',
                'Batu Berendam'
            ],
            'Negeri Sembilan' => [
                'Seremban',
                'Nilai',
                'Port Dickson',
                'Kuala Pilah',
                'Jempol',
                'Rembau',
                'Jelebu',
                'Senawang'
            ],
            'Pahang' => [
                'Kuantan',
                'Temerloh',
                'Bentong',
                'Raub',
                'Cameron Highlands',
                'Pekan',
                'Jerantut',
                'Maran'
            ],
            'Penang' => [
                'George Town',
                'Butterworth',
                'Bukit Mertajam',
                'Seberang Jaya',
                'Balik Pulau',
                'Nibong Tebal',
                'Tanjung Bungah',
                'Penang Island'
            ],
            'Perak' => [
                'Ipoh',
                'Taiping',
                'Kampar',
                'Sitiawan',
                'Teluk Intan',
                'Bagan Serai',
                'Parit Buntar',
                'Langkap'
            ],
            'Perlis' => [
                'Kangar',
                'Arau',
                'Padang Besar',
                'Bintong',
                'Beseri',
                'Sanglang',
                'Jalan Malam',
                'Kuala Perlis'
            ],
            'Sabah' => [
                'Kota Kinabalu',
                'Sandakan',
                'Tawau',
                'Kota Marudu',
                'Beaufort',
                'Keningau',
                'Lahad Datu',
                'Sipitang'
            ],
            'Sarawak' => [
                'Kuching',
                'Sibu',
                'Miri',
                'Bintulu',
                'Sarikei',
                'Mukah',
                'Limbang',
                'Kapit'
            ],
            'Wilayah Persekutuan Kuala Lumpur' => [
                'Kuala Lumpur'
            ],
            'Wilayah Persekutuan Labuan' => [
                'Labuan'
            ],
            'Wilayah Persekutuan Putrajaya' => [
                'Putrajaya'
            ],
        ];

        $countries = [
            'Malaysia',
            'Singapore',
            'Indonesia',
            'Thailand',
            'Philippines',
            'Brunei',
            'Vietnam',
            'Myanmar'
        ];

        return view('customerprofile', [
            'user' => Auth::user(),
            'locations' => $locations,
            'countries' => $countries
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'phonenum' => 'required|string|max:20',
        ]);

        $user = Auth::user();

        // Update the user's profile
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->zip = $request->input('zip');
        $user->country = $request->input('country');
        $user->phonenum = $request->input('phonenum');

        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
