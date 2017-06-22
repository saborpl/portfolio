import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the PopoverScene page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-search',
  templateUrl: 'popover-search.html'
})
export class PopoverSearchPage {
  searches: string[] = [];
  constructor(public navCtrl: NavController) {
    setTimeout(() => {
      for (var i = 1000; i < 1030; i++) {
        this.searches.push("" + i);
      }
    }, 100);
  }

  ionViewDidLoad() {
    console.log('Hello PopoverSearchesPage Page');
  }

}
