<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;






class ApiAuthContoller extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required'] ,// password:min(8)
        ]);
        
        $user=User::where('email',$request->email)->first();//get => all record
        if($user && Hash::check($request->password,$user->password)){ 
            // $user->tokens()->delete(); حصلت على كل التوكن تبع هل مستخدم وحذفتن مشان تحت عم انشئ توكن جديد 
           $token=$user->createToken('farah')->plainTextToken; 
           // بتاخد اسم والصلاحيات وتاريخ الانتهاء 
          // فيني بدل مامرق الاسم مرر من اينو جهاز جايني 
           // $request->userAgent()
           $data=['user'=>ApiResource::make($user),
                   'token'=>$token];

           return  response()->json($data,200);
           // token_name  اسم الجهاز الي مسجل المستخدم دخول منو  
        }
        return response()->json('not Authntication',401);

        // return apiResponce(null,401);

        // get =>>get collection 
    }



    public function register(Request $request){
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','email','unique:users,email'],
            'phone'=>['required','integer'],
            'password'=>['required'] , // confirm
        ]);

       $user = User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>$request->password, // bcrypt() اذا بدي شفر كلمة السر بايدي 
        ]);

        // $user=User::where('email',$request->email)->first();
        // if($user && Hash::check($request->password,$user->password)){
            // $user->tokens()->delete();
           $token=$user->createToken('farah')->plainTextToken;
        //    $t=$user->tokens()->first();
           $data=['user'=>$user,
                   'token'=>$token];
           return  response()->json($data,200);
        // }
        // return response()->json('not Authntication',401);

    }

    public function logout(){
    //    return Auth::guard('sunctom')->user(); // ررجعت المستحدم الي مسجل دخول 
    // return auth()->user(); (2)
    $user= Auth::user(); //(1) مستخدم الي مسجل دخول 
 //    $user->currentAccessToken()->delete(); // التوكن الي مسجل دخول فيه هلق
    // $user->tokens()->delete();
    return response()->json('token delet success',200);
// expiration  منححدد فيها مدة للتوكن مثلا بعد 30 دقيقة ينتها     
}
}
