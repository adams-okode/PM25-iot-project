package com.iot.app.iotapp.Services;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import com.iot.app.iotapp.DataLayer.Room;
import com.iot.app.iotapp.DataLayer.Wall;
import com.iot.app.iotapp.Helpers.NextSequenceHelper;
import com.iot.app.iotapp.Repositories.WallRepository;
import com.iot.app.iotapp.Requests.WallRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 * WallService
 */
@Service
public class WallService {
    @Autowired
    WallRepository wallRepository;

    @Autowired
    RoomService roomService;

    @Autowired
    NextSequenceHelper nextSequenceHelper;

    public List<Wall> getAllWalls() {
        List<Wall> Walls = new ArrayList<>();
        wallRepository.findAll().forEach(Walls::add);
        return Walls;
    }

    public Optional<Wall> getWall(Long id) {
        return wallRepository.findById(id);
    }

    public void addWall(WallRequest wallRequest) {
        Wall wall = new Wall();
        Room room = roomService.getRoom(wallRequest.getRoom_id());
        wall.setroom(room);
        wall.setId(nextSequenceHelper.getNextSequence("walls"));
        wall.setX1(wallRequest.getX1());
        wall.setX2(wallRequest.getX2());
        wall.setY1(wallRequest.getY1());
        wall.setY2(wallRequest.getY2());
        wallRepository.save(wall);
    }

    public void updateWall(Wall Wall, Long id) {
        wallRepository.save(Wall);
    }

    public void deleteWall(Long id) {
        wallRepository.deleteById(id);
    }

    public List<Wall> getAllRoomWalls(Long id) {
        return wallRepository.findByRoomId(id);
    }

}