package com.devweb.rh.controller;

import com.devweb.rh.model.Service;
import com.devweb.rh.repository.ServiceRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;
import java.util.List;

@RestController
@CrossOrigin
@RequestMapping(value = "/service")
public class ServiceController {

    @Autowired
    private ServiceRepository serviceRepository;

    @GetMapping(value = "/liste")
    @PreAuthorize("hasAuthority('ROLE_ADMIN')")
    public List<Service> serviceList(){
     return serviceRepository.findAll();
    }

    @PostMapping(value = "/add",consumes = {MediaType.APPLICATION_JSON_VALUE})
    @PreAuthorize("hasAuthority('ROLE_ADMIN')")
    public Service add(@RequestBody(required = false) Service s){
        return serviceRepository.save(s);
    }


    @PreAuthorize("hasAuthority('ROLE_ADMIN')")
    @PatchMapping(value = "/updateResto{id}",consumes = {MediaType.APPLICATION_JSON_VALUE})
    public Service update(@RequestBody Service service){

        return serviceRepository.save(service);
    }
    @PatchMapping("/edit/{id}")
    public Service showUpdateForm(@PathVariable("id") Integer id, Service service) {
        Service service1 = serviceRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Invalid user Id:" + id));

       return serviceRepository.save(service1);

    }
}
