import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router'
import { NavParams, NavController } from '@ionic/angular';

import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {
  name: string;
  routeParamsSubscription;
  quote: string;
  quoteAuthor: string;
  

  constructor(private route: ActivatedRoute, private storage: Storage, public navCtrl: NavController) {
    
  }

  //on view enter run quotes, get storage value name
  ionViewWillEnter() {
    this.storage.get("name").then(val => {
      this.name = val;
    });


    let quotes = [{quote:"Quote 1", author:"Author 1"},{quote:"Quote 2", author:"Author 2"}]
    
    let i = Math.floor(Math.random()*quotes.length)
    
    this.quote = quotes[i].quote
    this.quoteAuthor = quotes[i].author
    console.log(quotes[i].author)


  }



  //Open Settings
  openSettings() {
    this.navCtrl.navigateForward('/settings');
  }
  //On init
  ngOnInit() {
   
    //let name = this.storage.get("name")
    //this.name = this.route.snapshot.paramMap.get('name')
    // this.routeParamsSubscription = this.routeParamsSubscription.params.subscribe(params => {
    //   this.name = params['name'];
    // })
  }
  //Unused on destroy
  ngOnDestroy() {
    // this.routeParamsSubscription.unsubscribe();
  }




}
