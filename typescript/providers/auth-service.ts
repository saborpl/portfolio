import {Injectable} from '@angular/core';
import {Observable} from 'rxjs/Observable';
import {Http, Headers} from '@angular/http';
import 'rxjs/add/operator/map';
import {Platform} from 'ionic-angular';
//import { Device } from 'ionic-native';
import jsSHA from 'jssha';
import {Storage} from '@ionic/storage';

export class User {
  userid : number;
  username : string;
  fullname : string;
  sessionid : string;

  constructor(userid : number, username : string, fullname : string, sessionid : string) {
    this.userid = userid;
    this.username = username;
    this.fullname = fullname;
    this.sessionid = sessionid;
  }
}

@Injectable()
export class AuthService {
  public currentUser : User;
  public data : any;
  private _linkIntranet = "https://192.168.115.2:6502/system.library/login";
  private _linkLogoutIntranet = "https://192.168.115.2:6502/system.library/user/logout";
  public isLandscape : boolean;

  constructor(private http : Http, public platform : Platform, private storage : Storage,) {

    this.data = {};
    this.isLandscape = platform.isLandscape()
      ? true
      : false;
    //     console.log(platform.userAgent());
    // console.log(this.platform.platforms());     console.log(platform.versions());
    //     platform.ready().then(() => {       console.log(device.model);     });

  }

  // convert a json object to the url encoded format of
  // key=value&anotherkye=anothervalue
  private jsonToURLEncoded(jsonString) {
    return Object
      .keys(jsonString)
      .map(function (key) {
        return encodeURIComponent(key) + '=' + encodeURIComponent(jsonString[key]);
      })
      .join('&');
  }

  public login(credentials) {
    console.log(credentials);
    if (credentials.username === null || credentials.password === null) {
      return Observable.throw("Please insert credentials");
    } else {
      //this.getJsonCredentials(credentials);
      return Observable.create(observer => {

        // At this point make a request to your backend to make a real check!
        let shaObj = new jsSHA("SHA-256", "TEXT");
        shaObj.update(credentials.password);
        let hashPassword = ("HASHED" + shaObj.getHash("HEX"));
        console.log("HASHED7bf5173e336f538b2e9473aa57402e5d5dc42384851a8d1a2e7f73097b90167c")
        console.log(hashPassword);

        let body = this.jsonToURLEncoded({username: credentials.username, password: hashPassword, deviceid: "swcx91"});
        var headers = new Headers();
        headers.append('Content-Type', 'application/x-www-form-urlencoded');
        console.log("body: " + body);

        this
          .http
          .post(this._linkIntranet, body, {headers: headers})
          .subscribe(data => {
            if (data['_body'].substring(0, 4) === "fail") {
              this.data.response = data['_body'];
            } else {
              this.data.response = JSON.parse(data['_body']);
            }
            console.log("this.data.response: " + this.data.response);

            let access = (this.data.response.sessionid != null);
            this.currentUser = new User(this.data.response.userid, credentials.username, this.data.response.fullName, this.data.response.sessionid);
            this
              .storage
              .set('sessionid', this.data.response.sessionid);
            observer.next(access);
            observer.complete();

          }, error => {
            console.log("error: " + JSON.stringify(error.json()));
          });

      });
    }
  }

  public getUserInfo() : User {return this.currentUser;}

  public logout(sessionid) {
    return Observable.create(observer => {

      let body = this.jsonToURLEncoded({sessionid: sessionid});
      var headers = new Headers();
      headers.append('Content-Type', 'application/x-www-form-urlencoded');
      console.log("AuthService logout(sessionid) body: " + body);

      this
        .http
        .post(this._linkLogoutIntranet, body, {headers: headers})
        .subscribe(data => {
          this.data.response = data['_body'];

          this
            .storage
            .remove('sessionid')
            .then(() => {
              console.info('AuthService logout(sessionid): sessionid has been removed');
            });
          this
            .storage
            .clear()
            .then(() => {
              console.info('AuthService logout(sessionid): All keys have been cleared');
            });

          console.info("AuthService logout(sessionid): " + this.data.response);

          this.currentUser = null;
          observer.next(true);
          observer.complete();

        }, error => {
          console.error("AuthService logout(sessionid) error: " + JSON.stringify(error.json()));
        });
    });
  }

  public isSession() {
    if (this.currentUser.sessionid) {
      console.log("isSession: " + this.currentUser.sessionid);
      return true;
    }
  }

}

@Injectable()
export class Helpers {
  public isLandscape : boolean;

  constructor(private http : Http, public platform : Platform,) {
    this.isLandscape = platform.isLandscape()
      ? true
      : false;
    console.log("helpers");
    //     platform.ready().then(() => {       console.log(device.model);     });
  }

  public cLog(type, classname, text) {
    switch (type) {
      case "log":
        console.log(classname + ": " + text)break;
      case "info":
        console.info(classname + ": " + text)break;
      case "warn":
        console.warn(classname + ": " + text)break;
      case "error":
        console.error(classname + ": " + text)break;
      case "debug":
        console.debug(classname + ": " + text)break;
      case "exception":
        console.exception(classname + ": " + text)break;
    }
  }
}
