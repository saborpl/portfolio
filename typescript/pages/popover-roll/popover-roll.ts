import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the PopoverRoll page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-roll',
  templateUrl: 'popover-roll.html'
})
export class PopoverRollPage {
  rolls: string[] = [];
  constructor(public navCtrl: NavController) {
    setTimeout(() => {
      for (var i = 1; i < 29; i++) {
        this.rolls.push("" + i);
      }
    }, 100);
  }

  ionViewDidLoad() {
    console.log('Hello PopoverRollPage Page');
  }

}
