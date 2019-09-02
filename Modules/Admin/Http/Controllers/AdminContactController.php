<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::paginate(10);

        $viewData = [
            'contacts' => $contacts
        ];
        return view('admin::contact.index', $viewData);
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin::contact.update', compact('contacts'));

    }

    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $contact = Contact::find($id);
            switch ($action) {
                case 'delete':
                    $contact->delete();
                    break;
                case 'active':
                    $contact->c_active = $contact->c_active ? 0 : 1;
                    $contact->save();
                    break;
            }

        }
        return redirect()->back();
    }
}
