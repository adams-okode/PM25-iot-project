package com.iot.app.iotapp.Controllers;

import java.util.List;

import com.iot.app.iotapp.DataLayer.PM25;
import com.iot.app.iotapp.Requests.PM25Request;
import com.iot.app.iotapp.Responses.GeneralResponse;
import com.iot.app.iotapp.Services.PM25Service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

/**
 * SensorController
 */
@RestController
@RequestMapping(value = "/sensor")
public class SensorController {

    @Autowired
    PM25Service sensorService;

    @RequestMapping(value = "/getAll", method = RequestMethod.GET)
    public GeneralResponse getAllSensors() {
        List sensors = sensorService.getAllPM25();
        GeneralResponse response = new GeneralResponse<>(200, sensors, "");
        return response;
    }

    /**
     * 
     * @param Sensor
     * @return
     */
    @RequestMapping(value = "/create", method = RequestMethod.POST)
    public GeneralResponse createSensor(@RequestBody PM25Request sensor) {
        sensorService.addPM25(sensor);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }

    /**
     * 
     * @param Sensor
     * @param id
     * @return
     */
    @RequestMapping(value = "/update", method = RequestMethod.PUT)
    public GeneralResponse updateSensor(@RequestBody PM25 Sensor, @PathVariable Long id) {
        sensorService.updatePM25(Sensor, id);
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
    public GeneralResponse updateSensor(@RequestParam Long id) {
        sensorService.deletePM25(id);
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
    public GeneralResponse getSensorsInRoom(@RequestParam Long room_id) {
        List<PM25> data = sensorService.getAllRoomSensors(room_id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        response.setData(data);
        return response;
    }
}