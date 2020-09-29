    <h3>Discharge Questionnaire</h3>
      <div class="form-group row">
              <div class="col-md-1">
                  {!! Form::label('time', 'Time: ') !!}
              </div>
              <div class="col-md-2">
                  {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-3">
                  <p>Yes</p>
              </div>
              <div class="col-sm-3">
                  <p>No</p>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <p>1.   Is the subject oriented and has steady gait?</p>
              </div>
              <div class="col-sm-3">
                  <p>{!! Form::radio('DischargeQues1', 'Yes') !!}</p>
              </div>
              <div class="col-sm-3">
                  <p>{!! Form::radio('DischargeQues1', 'No') !!}</p>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <p>2.	Is the subject fit for discharge?</p>
              </div>
              <div class="col-sm-3">
                  <p>{!! Form::radio('DischargeQues1', 'Yes') !!}</p>
              </div>
              <div class="col-sm-3">
                  <p>{!! Form::radio('DischargeQues1', 'No') !!}</p>
              </div>
          </div>
          <div class="row">
              <p>The answers for all the statements above should be “Yes” before a subject is recommended for discharge. The attending physician is required to exercise his clinical judgement. The above criteria serve as a minimal guide only.</p>
          </div>
          <div class="row">
              <div class="col-sm-8">
                  {!! Form::label('Remarks', 'Additional Remarks (where applicable)') !!}
              </div>
          </div>
          <div class="row">
              <div class="col-md-8">
                  {!! Form::textarea('Remarks', '') !!}
              </div>
          </div>
          <div class="row">
              <div class="col-sm-3">
                  {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                  {!! Form::text('physicianSign', '') !!}
              </div>
          </div>
          <div class="row">
              <div class="col-sm-3">
                  {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                  {!! Form::text('physicianName', '') !!}
              </div>
          </div>