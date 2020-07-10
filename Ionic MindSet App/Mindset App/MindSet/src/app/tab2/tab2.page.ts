import { Component } from '@angular/core';

import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {
  journals = []

  constructor(private storage: Storage) {
    storage.get("journals").then(val => {
      this.journals = val;
    });
   }

   //test to see if data is being transferred
   ionViewWillEnter() {
     console.log(this.journals)
  }
}
