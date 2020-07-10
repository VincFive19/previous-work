import { Component, OnInit } from '@angular/core';
import { Storage } from '@ionic/storage';

import { Router, ActivatedRoute } from '@angular/router'

@Component({
  selector: 'app-new-journal-entry',
  templateUrl: './new-journal-entry.page.html',
  styleUrls: ['./new-journal-entry.page.scss'],
})
export class NewJournalEntryPage implements OnInit {
  journals = [{}];
  journal = {};

  constructor(private storage: Storage, private router: Router) {
    storage.get("journals").then(val => {
      this.journals = val;
    });
   }


  ngOnInit() {
  }
  
  
  //back button test
  cancel() {
    this.router.navigateByUrl('/tabs/tab2');
  }


  //test submission
  formSubmission() {
    this.router.navigateByUrl('/tabs/tab2')
  }

  //Log form test
  logForm(){
    console.log(this.journal);
    console.log(this.journals);
    // this.journals.push(this.journal);
    this.storage.set("journals", this.journals);
    this.router.navigateByUrl('/tabs/tab2');
  };
}
