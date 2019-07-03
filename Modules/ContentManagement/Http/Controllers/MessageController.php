<?php

namespace Modules\ContentManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContentManagement\Repositories\Message\MessageRepository;
use Modules\ContentManagement\Http\Requests\Message\UpdateRequest;

class MessageController extends Controller
{
    private $message;

    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
        $this->destinationpath = 'uploads/content-management/message/';
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contentmanagement::Message.index')
            ->withHighSchoolMessage($this->message->find(1))
            ->withPlusTwoMessage($this->message->find(2))
            ->withBachelorsMessage($this->message->find(3))
            ->withMastersMessage($this->message->find(4));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $category, $id)
    {
        switch ($category) {
            case 'School':
                $data['heading'] = $request->heading;
                $data['name'] = $request->name;
                $data['designation'] = $request->designation;
                $data['description'] = $request->description;
                $message = $this->updateCategoryMessage($id, $data, $request);
                break;
            
            case 'Plus Two':
                $data['heading'] = $request->heading;
                $data['name'] = $request->name;
                $data['designation'] = $request->designation;
                $data['description'] = $request->description;
                $message = $this->updateCategoryMessage($id, $data, $request);
                break;

            case 'Bachelors':
                $data['heading'] = $request->heading;
                $data['name'] = $request->name;
                $data['designation'] = $request->designation;
                $data['description'] = $request->description;
                $message = $this->updateCategoryMessage($id, $data, $request);
                break;

            case 'Masters':
                $data['heading'] = $request->heading;
                $data['name'] = $request->name;
                $data['designation'] = $request->designation;
                $data['description'] = $request->description;
                $message = $this->updateCategoryMessage($id, $data, $request);
                break;

            default:
                $message = null;
                break;
        }

        if($message){
            return redirect()->route('admin.content-management.message.index')
                ->withSuccessMessage('Message is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Message can not be updated, please try again.');
    }

    /**
     * Update about us based on id
     * Created at: Tuesday, March 5, 2019
     * Updated at: Tuesday, March 5, 2019
     * @author Siddhant Thapa
     * 
     * @param int $id
     * @param array $data
     * @param \Modules\ContentManagement\Http\Requests\AboutUs\UpdateRequest $request
     * @return \Modules\ContentManagement\Entities\AboutUs
     */
    private function updateCategoryMessage(int $id, array $data, UpdateRequest $request)
    {
        $message = $this->message->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $message->attachment) &&  $message->attachment != '') {
                unlink($this->destinationpath . $message->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'message_' . str_random(8) . '_' . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        return $this->message->update($id, $data);
    }
}
