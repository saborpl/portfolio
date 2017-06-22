import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the PopoverScene page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-tag',
  templateUrl: 'popover-tag.html'
})
export class PopoverTagPage {
  tags: string[] = [];
  constructor(public navCtrl: NavController) {
    setTimeout(() => {
      for (var i = 1; i < 30; i++) {
        this.tags.push("tagnum" + i);
      }
    }, 100);
  }

  ionViewDidLoad() {
    console.log('Hello PopoverTagPage Page');
  }

}
