package com.iot.app.iotapp.Services;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

import com.iot.app.iotapp.DataLayer.Room;
import com.iot.app.iotapp.Helpers.NextSequenceHelper;
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
	
	@Autowired
	NextSequenceHelper nextSequenceHelper;
    

    public List<Room> getAllRooms() {
		List<Room> Rooms = new ArrayList<>();
		roomRepository.findAll().forEach(Rooms::add);
		return Rooms;
	}

	public Room getRoom(Long id) {
		return roomRepository.findById(id).orElse(new Room());
    }
    
	public void addRoom(RoomRequest roomRequest) {
		Room room=new Room();
		room.setId(nextSequenceHelper.getNextSequence("rooms"));
		room.setCreated_at(LocalDateTime.now());
		room.setUpdated_at(LocalDateTime.now());
		room.setName(roomRequest.getName());
		room.setStatus(roomRequest.getStatus());
		room.setWalls(4);
		roomRepository.save(room);
	}

	public void updateRoom(Room Room, Long id) {
		roomRepository.save(Room);
	}

	public void deleteRoom(Long id) {
		roomRepository.deleteById(id);
	}


}