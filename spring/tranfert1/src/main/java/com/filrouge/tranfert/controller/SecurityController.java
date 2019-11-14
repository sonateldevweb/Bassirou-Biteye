package com.filrouge.tranfert.controller;

import com.filrouge.tranfert.model.Role;
import com.filrouge.tranfert.model.User;
import com.filrouge.tranfert.model.UserSignUp;
import com.filrouge.tranfert.repository.RoleRepository;
import com.filrouge.tranfert.repository.UserRepository;
import com.filrouge.tranfert.services.RoleService;
import com.filrouge.tranfert.services.UserDetailsServiceImpl;
import com.filrouge.tranfert.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.web.bind.annotation.*;


import java.util.HashSet;
import java.util.Set;

@CrossOrigin(origins = "*", maxAge = 3600)
@RestController
@RequestMapping("/api")
public class SecurityController {
    @Autowired
    AuthenticationManager authenticationManager;

    @Autowired
    UserRepository userRepository;

    @Autowired
    RoleRepository roleRepository;

    @Autowired
    PasswordEncoder encoder;

    @Autowired
    private UserService userService;

    @Autowired
    UserDetailsServiceImpl userDetailsService;
    @Autowired
    RoleService roleService;

    /*@PostMapping(value = "/inscription", consumes = {MediaType.APPLICATION_JSON_VALUE})
    @PreAuthorize("hasAnyAuthority('ROLE_ADMIN','ROLE_SUPER')")
    public User inscriptionUtilisateur(@RequestBody UserSignUp signUpRequest) throws Exception {

        User user=new User(signUpRequest.getName(), signUpRequest.getPrenom(),signUpRequest.getUsername(),
                signUpRequest.getEmail(), encoder.encode(signUpRequest.getPassword()),"actif");
        Set<Role> roles = new HashSet<>();
        Role role=new Role();
       // role.setId(signUpRequest.getProfil());//l id sera envoyé grace au value du select
        roles.add(role);
        user.setRoles(roles);
        return userService.save(user);
    }*/

   /* @PostMapping("/register")
    public ResponseEntity<String> registerUser(@Valid @RequestBody UserSignUp signUpRequest) {
        if(userRepository.existsByUsername(signUpRequest.getUsername())) {
            return new ResponseEntity<String>("Fail -> ce nom utilisateur est déja utilisé!",
                    HttpStatus.BAD_REQUEST);
        }

        if(userRepository.existsByEmail(signUpRequest.getEmail())) {
            return new ResponseEntity<String>("Fail -> cet Email est déja utilisé!",
                    HttpStatus.BAD_REQUEST);
        }

        // Creating user's account
        User user = new User(signUpRequest.getName(), signUpRequest.getPrenom(),signUpRequest.getUsername(),
                signUpRequest.getEmail(), encoder.encode(signUpRequest.getPassword()),"actif");

        Set<String> strRoles = signUpRequest.getRole();
        Set<Role> roles = new HashSet<>();


        strRoles.forEach(role -> {
            switch(role) {
                case "admin":
                    Role adminRole = roleRepository.findByName(RoleName.ROLE_ADMIN)
                            .orElseThrow(() -> new RuntimeException("Fail! -> Cause: User Role not find."));
                    roles.add(adminRole);

                    break;
                case "caissier":
                    Role roleCAISSIER = roleRepository.findByName(RoleName.ROLE_CAISSIER)
                            .orElseThrow(() -> new RuntimeException("Fail! -> Cause: User Role not find."));
                    roles.add(roleCAISSIER);

                    break;
                case "super":
                    Role roleSuper = roleRepository.findByName(RoleName.ROLE_SUPER)
                            .orElseThrow(() -> new RuntimeException("Fail! -> Cause: User Role not find."));
                    roles.add(roleSuper);

                    break;
                default:
                    Role userRole = roleRepository.findByName(RoleName.ROLE_USER)
                            .orElseThrow(() -> new RuntimeException("Fail! -> Cause: User Role not find."));
                    roles.add(userRole);
            }
        });

        user.setRoles(roles);
        userRepository.save(user);

        return ResponseEntity.ok().body("User registered successfully!");
    }*/
}
