 $sibling_student = Student::where('registration_no',$request->student_sibling_id)->first(); 

        $siblings =StudentSiblingInfo::where('student_sibling_id',$request->student_id)->orWhere('student_id',$request->student_id)->get();

            $sibling = StudentSiblingInfo::firstOrNew(['student_sibling_id'=>$sibling_student->student_sibling_id,'student_id'=>$request->student_id]);
            $sibling->student_sibling_id = $sibling_student->id;
            $sibling->student_id = $request->student_id; 
            $sibling->save(); 

            $self = StudentSiblingInfo::firstOrNew(['student_sibling_id' => $request->student_id, 'student_id' => $sibling_student->id]);
            $self->student_sibling_id = $request->student_id; 
            $self->student_id = $sibling_student->id;
            $self->save();


            foreach ($siblings as $key => $sibling) {

                if ($key == 0) {
                    $pre_sibling = new StudentSiblingInfo();
                     $pre_sibling->student_sibling_id = $sibling->student_sibling_id; 
                    $pre_sibling->student_id = $sibling_student->id; 
                    $pre_sibling->save();

                  
                }
                else {
                    $pre_sibling = new StudentSiblingInfo();
                    $pre_sibling->student_sibling_id = $sibling_student->id; 
                    $pre_sibling->student_id = $sibling->student_id; 
                    $pre_sibling->save();

                }
                
            } 

        return response()->json(['message'=>'add success']);