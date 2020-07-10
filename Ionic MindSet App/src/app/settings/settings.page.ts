import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';

import { Router, ActivatedRoute } from '@angular/router'
import { Events } from '@ionic/angular';

import { Storage } from '@ionic/storage';

import { ModalNamePage } from '../modal-name/modal-name.page';
import { ModalEmailPage } from '../modal-email/modal-email.page';
import { ModalPsychologistEmailPage } from '../modal-psychologist-email/modal-psychologist-email.page';

@Component({
  selector: 'app-settings',
  templateUrl: './settings.page.html',
  styleUrls: ['./settings.page.scss'],
})
export class SettingsPage implements OnInit {
  name="";
  psychologistEmail="";
  email="";

  constructor(private modalController: ModalController, private router: Router, private route: ActivatedRoute, private storage: Storage) { 
    // storage.get("name").then(val => {
    //   this.name = val;
    // });
  }

  //Present name Modal Window
  async presentNameModal() {
    console.log("this")
    const modal = await this.modalController.create({
      component: ModalNamePage,
      componentProps: {name: this.name}
    });

    modal.onDidDismiss()
      .then((retval) => {
        this.name = retval.data;
        this.storage.set("name", this.name);
      });
      return modal.present();
      
  }

  //Present email Modal Window
  async presentEmailModal() {
    console.log("this")
    const modal = await this.modalController.create({
      component: ModalEmailPage,
      componentProps: {email: this.email}
    });
  
    modal.onDidDismiss()
      .then((retval) => {
        this.email = retval.data;
        this.storage.set("email", this.email);
    });
    return modal.present();
        
  }

  //Present Psychologist Email Modal Window
  async presentPsychologistEmailModal() {
    console.log("this")
    const modal = await this.modalController.create({
      component: ModalPsychologistEmailPage,
      componentProps: {psychologistEmail: this.psychologistEmail}
    });
    
    modal.onDidDismiss()
      .then((retval) => {
        this.psychologistEmail = retval.data;
        this.storage.set("psychologistEmail", this.psychologistEmail);
      });
    return modal.present();
          
  }

  //Back button test function
  backButton() {
    console.log(name)
    this.router.navigateByUrl('/tabs/tab1')
    //this.router.navigateByUrl('/tabs/tab1/' + this.name)
  }

  //On init get storage values
  async ngOnInit() {
    //this.router.navigateByUrl('/tabs/tab1/' + this.name)
    this.name = await this.storage.get("name");
    this.email = await this.storage.get("email");
    this.psychologistEmail = await this.storage.get("psychologistEmail");
  }

}
