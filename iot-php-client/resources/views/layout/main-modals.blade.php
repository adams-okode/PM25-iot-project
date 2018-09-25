<!-- Modal -->
<div class="modal fade" id="wall-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Define Wall</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">x1</label>
                            <input type="email" class="form-control" id="wall-x1" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">y1</label>
                            <input type="email" class="form-control" id="wall-y1" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">x2</label>
                            <input type="email" class="form-control" id="wall-x2" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">y2</label>
                            <input type="email" class="form-control" id="wall-y2" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="create_wall();">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="anchor-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Anchors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">x</label>
                            <input type="email" class="form-control" id="anchor-x1" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">y</label>
                            <input type="email" class="form-control" id="anchor-y1" aria-describedby="emailHelp"
                                placeholder="100">

                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Tag</label>
                          <input type="email" class="form-control" id="anchor-tag" aria-describedby="emailHelp"
                              placeholder="name...">

                      </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="create_anchor();">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="room-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="email" class="form-control" id="room-name" placeholder="">

                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="create_room();">Save changes</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="reading-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Value</label>
                            <input type="email" class="form-control" id="reading-value" placeholder="">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">X</label>
                            <input type="email" class="form-control" id="reading-x" placeholder="">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Y</label>
                            <input type="email" class="form-control" id="reading-y" placeholder="">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Sensor</label>
                      <select class="form-control" id="reading-sensor">
                      @php
                        if(isset($sensors)){
                      @endphp
                      

                      @foreach($sensors as $sensor)
                        <option value = "{{ @$sensor->id }}">{{ @$sensor->tag }}</option>
                      @endforeach


                      @php
                        }
                      @endphp
                     
                      </select>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="create_reading();">Save changes</button>
            </div>
        </div>
    </div>
</div>
