import { Component, OnInit } from '@angular/core';
import { NavParams, ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modal-email',
  templateUrl: './modal-email.page.html',
  styleUrls: ['./modal-email.page.scss'],
})
export class ModalEmailPage implements OnInit {

  email: string;

  constructor(private navParams: NavParams, private modalController: ModalController) { }

  //On initisilisation get storage of email
  ngOnInit() {
    this.email = this.navParams.get('email');
  }

  //Closes Modal
  closemodal(){
    this.modalController.dismiss(this.email);
  }
}
