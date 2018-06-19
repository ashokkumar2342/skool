<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeGroup;
use App\Model\FeeGroupDetail;
use App\Model\FeeStructure;
use Illuminate\Http\Request;

class FeeGroupDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $feeGroupDetail = FeeGroupDetail::orderBy('isapplicable_id','desc')->get();
        $feeGroup = array_pluck(FeeGroup::get(['id','name'])->toArray(),'name', 'id'); 
        
        return view('admin.finance.fee_group_detail',compact('feeGroup','feeGroupDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)

   {
       // return dd($request->all());

       // $validator = Validator::make($request->all(), [
       
       //     'fee_group_id' => 'required|max:3', 
       //     'fee_structure_id' => 'required|max:30', 
       //     'is_applicable' => 'required', 
            
             
       // ]);
       foreach ($request->value as $key => $value) {
        
         $feeGroupDetail = FeeGroupDetail::where(['fee_group_id'=>$request->fee_group_id,'fee_structure_id'=>$key])->firstOrNew(['fee_structure_id'=>$key]);
         $feeGroupDetail->fee_structure_id = $key;
         $feeGroupDetail->isapplicable_id = $value;
         $feeGroupDetail->fee_group_id = $request->fee_group_id;
         $feeGroupDetail->save();

      }
          
      return response()->json(['message'=>'Save Succesfully', 'class'=>'sucess']);
   }
    /////////////////////////search////////////////
    public function search(Request $request)
    {
        $feeStructurs = FeeStructure::all();
        foreach ($feeStructurs as $feeStructur) {
            $checked = (\App\Model\FeeGroupDetail::where(['fee_structure_id'=>$feeStructur->id,'fee_group_id'=>$request->fee_group_id])->count())?'checked':'checked'; 
            $row = '<tr> 
            <td> '.'<input type="checkbox" class="checkbox" '.$checked.' name="fee_structure_id[]" value="'.$feeStructur->id.'" style="display:none">'.  '</td>
            <td>'.$feeStructur->name.'</td>

            ';
            foreach(\App\Model\Isapplicable::all() as $applicable){
                $checked = (\App\Model\FeeGroupDetail::where(['fee_structure_id'=>$feeStructur->id,'isapplicable_id'=>$applicable->id,'fee_group_id'=>$request->fee_group_id])->count())?'checked':'';
                      $row .='<td >
                      <label class="radio-inline"><input type="radio" '.$checked.' name="value['.$feeStructur->id.']" class="'. str_replace(' ', '_', strtolower($applicable->name)).'"   value="'. $applicable->id .'"> '. $applicable->name .' </label>
                      </td>';
            }           
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeGroupDetail  $feeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function show(FeeGroupDetail $feeGroupDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeGroupDetail  $feeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeGroupDetail $feeGroupDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeGroupDetail  $feeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeGroupDetail $feeGroupDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeGroupDetail  $feeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeGroupDetail $feeGroupDetail)
    {
        //
    }
}
