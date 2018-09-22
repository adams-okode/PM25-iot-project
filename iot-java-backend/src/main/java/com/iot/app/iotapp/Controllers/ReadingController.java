package com.iot.app.iotapp.Controllers;

import com.iot.app.iotapp.Requests.ReadingRequest;
import com.iot.app.iotapp.Responses.GeneralResponse;
import com.iot.app.iotapp.Services.ReadingService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

/**
 * ReadingController
 */
@RestController
@RequestMapping( value= "/readings")
public class ReadingController {
    @Autowired
    ReadingService readingService;

    @RequestMapping(value = "/sortBySensor", method = RequestMethod.GET)
    public GeneralResponse getAllReadingsBySensor(@RequestParam Long sensor_id){
        readingService.getAllSensorReadings(sensor_id);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;
    }

     /**
     * 
     * @param room
     * @return
     */
    @RequestMapping(value = "/post", method = RequestMethod.POST)
    public GeneralResponse createRoom(@RequestBody ReadingRequest reading) {
        readingService.addReading(reading);
        GeneralResponse response = new GeneralResponse<>();
        response.setMessage("success");
        response.setStatus_code(200);
        return response;

    }
    
}