<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AgentController extends Controller
{
    // All Agent
    public function AllAgent(){
        $agents = Agent::latest()->get();
        return view('backend.agent.all_agent',compact('agents'));
    } // End All Agent

    // Add Agent
    public function AddAgent() {
        return view('backend.agent.add_agent');
    } // End Agent

    // Store Agent
    public function StoreAgent(Request $request){
        if ($request->file('agent_photo')) {
            $manager = new ImageManager(new Driver());
            $strAgentNameGen = hexdec(uniqid()).'.'.$request
            ->file('agent_photo')->getClientOriginalExtension();

            $strResizeAgentImg = $manager->read($request->file('agent_photo'))
            ->resize(300, 300)->save('upload/agent_images/'.$strAgentNameGen);
            $strAgentImgUrl = 'upload/agent_images/'.$strAgentNameGen;
        }

        Agent::insertGetId([
            'agent_name' => $request-> agent_name,
            'agent_username' => $request-> agent_username,
            'agent_email' => $request-> agent_email,
            'agent_facebookurl' => $request-> agent_facebookurl,
            'agent_twitterurl' => $request-> agent_twitterurl,
            'agent_instagramurl' => $request-> agent_instagramurl,
            'agent_phone' => $request->agent_phone,
            'agent_address' => $request->agent_address,
            'agent_description' => $request->agent_description,
            'agent_status' => $request->agent_status,
            'agent_photo' => $strAgentImgUrl,
        ]);

        $notification = array(
            'message' => "Agent's Created Successfully",
            'alert-type' => "success"
        );

        return redirect()->route('all.agent')->with($notification);

    } // End Store Agent

    // Edit Agent
    public function EditAgent($id){
        $editAgents = Agent::findOrFail($id);

        return view('backend.agent.edit_agent',
        compact('editAgents'));
    }

    // Update Agent
    public function UpdateAgent(Request $request) {

        $updateAgentId = $request->id;

        Agent::findOrFail($updateAgentId)->update([
            'agent_name' => $request-> agent_name,
            'agent_username' => $request-> agent_username,
            'agent_email' => $request-> agent_email,
            'agent_facebookurl' => $request-> agent_facebookurl,
            'agent_twitterurl' => $request-> agent_twitterurl,
            'agent_instagramurl' => $request-> agent_instagramurl,
            'agent_phone' => $request->agent_phone,
            'agent_address' => $request->agent_address,
            'agent_description' => $request->agent_description,
            'agent_status' => $request->agent_status,

        ]);

        $updateAgentImage = $request->agentImageId;
        $prevUpdateAgentImage = $request->prevAgentImage;

        if ($request->file('agent_image')) {
            $manager = new ImageManager(new Driver);
            $updateAgentImageNameGen = hexdec(uniqid()).'.'.$request
            ->file('agent_image')->getClientOriginalExtension();

            $updateAgentImagePath = $manager->read($request->file('agent_image'))
            ->resize(300, 300)->save('upload/property/main_image/'.$updateAgentImageNameGen);
            $updateAgentImageSave = 'upload/property/main_image/'.$updateAgentImageNameGen;
        }

        if (file_exists($prevUpdateAgentImage)) {
            unlink($prevUpdateAgentImage);
        }

        Agent::findOrFail($updateAgentImage)->update([
            'agent_photo' => $updateAgentImageSave,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Agent Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);
    }

    // DeleteType
    public function DeleteAgent($id){

        $delAgent = Agent::findOrFail($id);
        unlink($delAgent->agent_photo);

        Agent::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Agent Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// DeleteType End Method
}
