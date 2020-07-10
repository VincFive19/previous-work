import { Component, OnInit } from '@angular/core';
import { NavParams, ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modal-name',
  templateUrl: './modal-name.page.html',
  styleUrls: ['./modal-name.page.scss'],
})
export class ModalNamePage implements OnInit {
  name: string;

  constructor(private navParams: NavParams, private modalController: ModalController) { }

  //On initisilisation get storage of name
  ngOnInit() {
    this.name = this.navParams.get('name');
  }

  //close modal
  closemodal(){
    this.modalController.dismiss(this.name);
  }
}
