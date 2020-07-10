import { Component, OnInit } from '@angular/core';
import { NavParams, ModalController } from '@ionic/angular';
import { Router, ActivatedRoute } from '@angular/router'
import { Storage } from '@ionic/storage';

import { EmailService } from '../email.service';

@Component({
  selector: 'app-editjournalentry',
  templateUrl: './editjournalentry.page.html',
  styleUrls: ['./editjournalentry.page.scss'],
})
export class EditjournalentryPage implements OnInit {


  journals;
  journal = {};
  date: string
  time;
  context;
  triggers;
  cope;
  intensity;
  image;

  edit = true;
  email;
  psychologistEmail;
  username;
  imageFile

  constructor(private storage: Storage, private router: Router, private navParams: NavParams, private modalController: ModalController, private emailService: EmailService) {
    storage.get("email").then(val => {
      this.email = val;
    });
    storage.get("psychologistEmail").then(val => {
      this.psychologistEmail = val;
    });
    storage.get("name").then(val => {
      this.username = val;
    });
  }


  ngOnInit() {
    this.journals = this.navParams.get("journals");
  }


  //back button
  cancel() {
    this.router.navigateByUrl('/tabs/tab2');
  }

  //Image loader and get
  imageSelected(files) {
    if (files.length > 0) {

    }
    let fileReader = new FileReader();

    fileReader.onload = e => {
      this.imageFile = fileReader.result;

    }
    fileReader.readAsDataURL(files[0]);
  }


  //Form Submission
  logForm() {
    //   console.log(this.journal);
    //   console.log(this.journals);
    //   // this.journals.push(this.journal);
    //   this.storage.set("journals", this.journals);
    //   this.router.navigateByUrl('/tabs/tab2');


    let realTime = this.date.slice(0, 10) + " " + this.time.slice(11, 16);

    let realIntensity = parseInt(this.intensity, 10);

    let journal = { time: realTime, context: this.context, triggers: this.triggers, cope: this.cope, intensity: realIntensity, image: this.imageFile };
    console.log(journal);
    console.log(this.journals);
    // if (this.journals == null) {
    //   this.journals = [{journal}]
    // } else {
    // this.journals.unshift(journal)
    //}

    this.journals = journal;

    this.emailService.sendEmail(journal, this.edit, this.username, this.psychologistEmail, this.email);
    this.modalController.dismiss(this.journals);
  };

}
