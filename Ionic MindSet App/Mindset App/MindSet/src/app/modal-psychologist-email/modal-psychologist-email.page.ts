import { Component, OnInit } from '@angular/core';
import { NavParams, ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modal-psychologist-email',
  templateUrl: './modal-psychologist-email.page.html',
  styleUrls: ['./modal-psychologist-email.page.scss'],
})
export class ModalPsychologistEmailPage implements OnInit {

  psychologistEmail: string;

  constructor(private navParams: NavParams, private modalController: ModalController) { }

  //On initilisation set psychologistEmail initial Value set in storage
  ngOnInit() {
    this.psychologistEmail = this.navParams.get('psychologistEmail');
  }

  //Closes Modal
  closemodal(){
    this.modalController.dismiss(this.psychologistEmail);
  }

}
