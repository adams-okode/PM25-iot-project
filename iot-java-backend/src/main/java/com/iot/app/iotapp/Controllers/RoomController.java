package com.iot.app.iotapp.Controllers;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Room;
import com.iot.app.iotapp.Requests.RoomRequest;
import com.iot.app.iotapp.Responses.GeneralResponse;
import com.iot.app.iotapp.Services.RoomService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

/**
 * RoomController
 */

@RestController
@RequestMapping(value = "/rooms")
public class RoomController {

    @Autowired
    RoomService roomService;

    @RequestMapping(value = "/getAll", method = RequestMethod.GET)
    public GeneralResponse getAllRooms() {
        List rooms = roomService.getAllRooms();
        GeneralResponse response = new GeneralResponse<>(200, rooms, "");
        return response;
    }


    /**
     * 
     * @param room
     * @return
     */
    @RequestMapping(value = "/create", method = RequestMethod.POST)
    public GeneralResponse createRoom(@RequestBody Room room){
        roomService.addRoom(room);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }


    /**
     * 
     * @param room
     * @param id
     * @return
     */
    @RequestMapping(value = "/update", method = RequestMethod.PUT)
    public GeneralResponse updateRoom(@RequestBody Room room, @PathVariable Long id){
        roomService.updateRoom(room, id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }

    /**
     * 
     * @param id
     * @return
     */
    @RequestMapping(value = "/delete", method = RequestMethod.DELETE)
    public GeneralResponse updateRoom(@RequestParam Long id){
        roomService.deleteRoom(id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }


}