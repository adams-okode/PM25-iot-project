package com.iot.app.iotapp.Services;

import java.util.ArrayList;
import java.util.List;

import com.iot.app.iotapp.DataLayer.PM25;
import com.iot.app.iotapp.DataLayer.Room;
import com.iot.app.iotapp.Repositories.PM25Repository;
import com.iot.app.iotapp.Requests.PM25Request;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 * PM25Service
 */
@Service
public class PM25Service {
    @Autowired
    PM25Repository PM25Repository;

    @Autowired
    RoomService roomService;

    
    public List<PM25> getAllPM25() {
		List<PM25> sensors = new ArrayList<>();
		PM25Repository.findAll().forEach(sensors::add);
		return sensors;
	}

	public PM25 getPM25(Long id) {
		return PM25Repository.findById(id).orElse(new PM25());
    }
    
	public void addPM25(PM25Request pM25Request) {
        PM25 PM25 = new PM25();
        Room room = roomService.getRoom(pM25Request.getRoom_id());
        PM25.setRoom(room);
       
        PM25.setX2(pM25Request.getX2());
       
        PM25.setY2(pM25Request.getY2());
		PM25Repository.save(PM25);
	}

	public void updatePM25(PM25 PM25, Long id) {
		PM25Repository.save(PM25);
	}

	public void deletePM25(Long id) {
		PM25Repository.deleteById(id);
    }
    
    public List<PM25> getAllRoomSensors(Long id){
        return PM25Repository.findByRoomId(id);
    }
    
}