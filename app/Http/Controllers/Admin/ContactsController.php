<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request->input('q');

        $max_page = 30;

        $manufacturers = Manufacturer::pluck('title', 'id')->all();


        if (empty($q)) {
            $contacts = Contact::paginate(10);
        } else {
            $contacts = $this->search($q, $max_page);
        }

        $contactCount = DB::table('contacts')->count();

        return view('admin.contacts.index', ['include' => 'search.table', 'contacts' => $contacts, 'manufacturers' => $manufacturers, 'contactCount' => $contactCount])->render();

    }

    public function search($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $contacts = Contact::whereRaw("MATCH(name,email,manufacturer_other) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
                                        $qQeury)->paginate($count) ;
        return $contacts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::pluck('title', 'id')->all();
        return view('admin.contacts.create', compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'               => 'required',
            'surname'            => 'nullable',
            'email'              => 'nullable|email',
            'manufacturer_id'    => 'nullable',
            'manufacturer_other' => 'nullable',
        ]);

        $contact = Contact::add($request->all());
        $contact->setManufacturer($request->get('manufacturer_id'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $manufacturers = Manufacturer::pluck('title', 'id')->all();

        return view('admin.contacts.edit', compact('contact', 'manufacturers'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'               => 'required',
            'surname'            => 'nullable',
            'email'              => 'nullable|email',
            'manufacturer_id'    => 'nullable',
            'manufacturer_other' => 'nullable',
        ]);

        $contact = Contact::find($id);
        $contact->edit($request->all());
        $contact->setManufacturer($request->get('manufacturer_id'));
        return redirect()->route('contacts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->back();
    }
}
