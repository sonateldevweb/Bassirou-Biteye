package com.filrouge.tranfert.services;

import com.filrouge.tranfert.model.User;
import com.filrouge.tranfert.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class UserService {
    @Autowired
    UserRepository userRepository;

    public User save(User user){

        return userRepository.save(user);
    }

    public List<User> findAll(){
        return userRepository.findAll();
    }
  /*  public Optional<User> findById(int id){
        return userRepository.findById(id);
    }*/
}
