<?php

namespace Controller;

use Model\Room;
use Model\Subdivision;
use Model\Subscriber;
use Model\Telephone;
use Src\Auth\Auth;
use Src\Protect;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Model\Post;
use Model\User;
use Illuminate\Database\Capsule\Manager as DB;

class Site
{
    public function index(Request $request): string
    {
       $posts = Post::where('id', $request->id ?? 0)->get();
       return (new View())->render('site.post', ['posts' => $posts]);

       $subdivitions = Subdivition::all();       
       return (new View())->render('site.hello', ['subdivitions' => $subdivitions]);
    }

   public function hello(): string
   {
       return new View('site.hello');
   }

   public function signup(Request $request): string
   {
      if ($request->method === 'POST') {
   
          $validator = new Validator($request->all(), [
              'login' => ['required'],
              'password' => ['required', 'unique:users,password']
          ], [
              'required' => 'Поле :field пусто',
              'unique' => 'Поле :field должно быть уникально'
          ]);
   
          if($validator->fails()){
              return new View('site.signup',
                  ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
          }
   
          if (User::create($request->all())) {
              app()->route->redirect('/login');
          }
      }
      return new View('site.signup');
   }
    

   public function login(Request $request): string
    {
    //Если просто обращение к странице, то отобразить форму
    if ($request->method === 'GET') {
        return new View('site.login');
    }
    //Если удалось аутентифицировать пользователя, то редирект !!!
    if (Auth::attempt($request->all())) {
        app()->route->redirect('/hello');
    }
    //Если аутентификация не удалась, то сообщение об ошибке
    return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function addsubscribers(Request $request): string
    {
        $subscribers = Subscriber::all() ?? [];

        if ($request->method === 'POST') {

            switch (true) {
                case Protect::check_string($model, "subscriber"):
                    $validator = new Validator($request->all(), [
                        'firstname' => ['required'],
                        'lastname' => ['required'],
                        'birth_date' => ['required']
                    ], [
                        'required' => 'Поле :field должно быть заполнено',
                    ]);
                    if ($validator->fails()) {
                        return new View('site.addsubscribers', ["subdivisions" => $subdivisions, "subscribers" => $subscribers,
                            "rooms" => $rooms, "rooms_types" => $rooms_types,
                            "subdivisions_types" => $subdivisions_types, "telephones" => $telephones,
                            "subscribersCount" => $subscribersCount,
                            "subscriberErrors" => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
                    } else {
                        Subscriber::create($request->all());
                    }
                    break;
            }
        }

        if ($request->method === 'GET') {
            $telephones = Telephone::all();
            $subscriber = $request->all()['subscriber'] ?? "all";
            $room = $request->all()['room'] ?? "all";
            $subdivision = $request->all()['subdivision'] ?? "all";

            if ($subscriber !== 'all' && (int)$subscriber) {
                $telephones = $telephones->where('subscriber_id', $subscriber);
            }
            if ($room !== 'all' && (int)$room) {
                $telephones = $telephones->where('room_num', $room);
            }
            if ($subdivision !== 'all' && (int)$subdivision) {
                $telephones = $telephones->whereIn(
                    'room_num',
                    Room::where('subdivision_id', $subdivision)->pluck('room_num')->toArray()
                );
            }
            $subscribersCount = count(array_unique($telephones->pluck('subscriber_id')->toArray()));
        }

        return new View('site.addsubscribers', ["subscribers" => $subscribers,
        "subscribersCount" => $subscribersCount ?? 0]);
    }

    public function addphone(): string
    {
        return new View('site.addphone');
    }

    public function subphone(): string
    {
        return new View('site.subphone');
    }

    public function addroom(): string
    {
        return new View('site.addroom');
    }

    public function adddepartment(): string
    {
        return new View('site.adddepartment');
    }
}