package com.iot.app.iotapp.Controllers;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Wall;
import com.iot.app.iotapp.Requests.WallRequest;
import com.iot.app.iotapp.Responses.GeneralResponse;
import com.iot.app.iotapp.Services.WallService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

/**
 * WallController
 */

@RestController
@RequestMapping(value = "/Walls")
public class WallController {

    @Autowired
    WallService wallService;

    @RequestMapping(value = "/getAll", method = RequestMethod.GET)
    public GeneralResponse getAllWalls() {
        List walls = wallService.getAllWalls();
        GeneralResponse response = new GeneralResponse<>(200, walls, "");
        return response;
    }

    /**
     * 
     * @param Wall
     * @return
     */
    @RequestMapping(value = "/create", method = RequestMethod.POST)
    public GeneralResponse createWall(@RequestBody WallRequest Wall) {
        wallService.addWall(Wall);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }

    /**
     * 
     * @param Wall
     * @param id
     * @return
     */
    @RequestMapping(value = "/update", method = RequestMethod.PUT)
    public GeneralResponse updateWall(@RequestBody Wall Wall, @PathVariable Long id) {
        wallService.updateWall(Wall, id);
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
    public GeneralResponse updateWall(@RequestParam Long id) {
        wallService.deleteWall(id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }

    /**
     * 
     * @param room_id
     * @return
     */
    @RequestMapping(value = "/roomClassified", method = RequestMethod.GET)
    public GeneralResponse getWallsInRoom(@RequestParam Long room_id) {
        List<Wall> data = wallService.getAllRoomWalls(room_id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        response.setData(data);
        return response;
    }

}