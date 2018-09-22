package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Wall;

import org.springframework.data.repository.CrudRepository;

/**
 * WallRepository
 */
public interface WallRepository extends CrudRepository<Wall, Long>{
    List<Wall> findByRoomId(Long id);
}