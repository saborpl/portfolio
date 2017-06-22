import { Injectable } from '@angular/core';
//import { Observable } from 'rxjs/Observable';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/map';
//import { Platform } from 'ionic-angular';
import { AlertController } from 'ionic-angular';

export class Production {
  productions: {}

  constructor(productions: {}) {
    this.productions = productions;
  }
}

@Injectable()
export class ProductionService {
  public currentProduction: Production;
  public data: any;
  private _linkProduction = "https://intranet.friendup.cloud:6502/system.library/module/";
  //private _linkProduction = "https://s3-eu-west-1.amazonaws.com/storage.drylab.no/kings_choice_v3/";

  constructor(
    private http: Http,
    private alertCtrl: AlertController,
  ) {
    this.data = {};
  }

  //convert a json object to the url encoded format of key=value&anotherkye=anothervalue
  private jsonToURLEncoded(jsonString) {
    return Object.keys(jsonString).map(function (key) {
      return encodeURIComponent(key) + '=' + encodeURIComponent(jsonString[key]);
    }).join('&');
  }

  public jsonProductionList(sessionid) {
    console.log(sessionid);
    if (!sessionid) {
      console.error("ProductionService: " + "no SESSIONID!");
      return;
    } else {
      //console.log("jsonProduction()")
      //return Observable.create(observer => {
      //sessionid=892e37613c710c6ae581f61594f8683c8891f892&module=drylab&args=false&command=listproductions
      let body = this.jsonToURLEncoded({ sessionid: sessionid, module: "drylab", args: false, command: "listproductions" });
      var headers = new Headers();
      headers.append('Content-Type', 'application/x-www-form-urlencoded');
      console.log("bodyP " + body);

      this.http.post(this._linkProduction, body, {
        headers: headers
      })
        .subscribe(data => {
          this.data.response = JSON.parse(data['_body']);
          console.log("this.data.response: " + this.data.response.data);

          //let access = (this.data.response.success === true);
          this.currentProduction = new Production(this.data.response.data);
          console.log("this.currentProduction: " + this.currentProduction);
          //observer.next(access);
          //observer.complete();

        }, error => {
          console.log("error: " + JSON.stringify(error.json()));
        }
        );


      //});
    }
  }

  defaultAlert(title, subTitle, button) {
    let alert = this.alertCtrl.create({
      title: title,
      subTitle: subTitle,
      buttons: [
        {
          text: button,
          handler: () => {
            //this.navCtrl.push();
          }
        }
      ]
    });
    alert.present();
  }

  //   public getProductionList(): Production {
  //     console.log("getProductionList(): " + this.currentProduction);
  //     return this.currentProduction;
  //   }

  public getProductionList() {
    console.log("getProductionList(): ");
    return this.currentProduction;
  }

}
