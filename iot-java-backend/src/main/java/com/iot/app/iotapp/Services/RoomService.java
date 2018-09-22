package com.iot.app.iotapp.Services;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import com.iot.app.iotapp.DataLayer.Room;
import com.iot.app.iotapp.DataLayer.Wall;
import com.iot.app.iotapp.Repositories.RoomRepository;
import com.iot.app.iotapp.Requests.RoomRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 * RoomService
 */
@Service
public class RoomService {

    @Autowired
    RoomRepository roomRepository;

    public List<Room> getAllRooms() {
		List<Room> Rooms = new ArrayList<>();
		roomRepository.findAll().forEach(Rooms::add);
		return Rooms;
	}

	public Optional<Room> getRoom(Long id) {
		return roomRepository.findById(id);
    }
    
	public void addRoom(Room Room) {
		
		roomRepository.save(Room);
	}

	public void updateRoom(Room Room, Long id) {
		roomRepository.save(Room);
	}

	public void deleteRoom(Long id) {
		roomRepository.deleteById(id);
	}


	public void createRoomWall(Long id, Wall wall){
		Optional<Room> room = roomRepository.findById(id);


	}
}