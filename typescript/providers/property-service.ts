import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/Rx';

@Injectable()
export class PropertyService {
  private _productionListURL = "https://intranet.friendup.cloud:6502/system.library/module/";
  constructor(
    private http: Http,
  ) { }

  private jsonToURLEncoded(jsonString) {
    return Object.keys(jsonString).map(function (key) {
      return encodeURIComponent(key) + '=' + encodeURIComponent(jsonString[key]);
    }).join('&');
  }

  searchMovies(movieName) {
    var url = 'http://api.themoviedb.org/3/search/movie?query=&query=' + encodeURI(movieName) + '&api_key=5fbddf6b517048e25bc3ac1bbeafb919';
    var response = this.http.post(url, null).map(res => res.json());
    return response;
  }

  getRemoteProduction(sessionid, productionid) {
    let body = this.jsonToURLEncoded({ sessionid: sessionid, module: "drylab", args: "{\"id\":\"" + productionid + "\"}", command: "loadproduction" });
    console.log(body);
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    var response = this.http.post(this._productionListURL, body, options).map(res => res.json());
    return response;
  }

  getProductionDetails(sessionid, productionid) {
    let body = this.jsonToURLEncoded({ sessionid: sessionid, module: "drylab", args: "{\"id\":\"" + productionid + "\"}", command: "loadproduction" });
    console.log(body);
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    return this.http.post(this._productionListURL, body, options)
      .subscribe(res => {
        let data = res.json();
        console.log("this.data: " + data);
      }, error => {
        console.log("error: " + JSON.stringify(error.json()));
      }
      );
  }

  getProductionDetails2(sessionid, productionid) {
    let body = this.jsonToURLEncoded({ sessionid: sessionid, module: "drylab", args: { id: productionid }, command: "loadproduction" });
    //let body = "sessionid=" + sessionid + "&module=drylab&args=%7B%22id%22%3A%22king%22%7D&command=loadproduction";
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
    let options = new RequestOptions({ headers: headers });
    return this.http.post(this._productionListURL, body, options)
      .subscribe(res => {
        let data = res['_body'];
        console.log("this.data: " + data);
      }, error => {
        console.log("error: " + JSON.stringify(error.json()));
      }
      );
  }

  getProductionList2(sessionid) {
    let body = this.jsonToURLEncoded({ sessionid: sessionid, module: "drylab", args: false, command: "listproductions" });
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
    let options = new RequestOptions({ headers: headers });
    return this.http.post(this._productionListURL, body, options)
      .subscribe(res => {
        let data = res['_body'];
        console.log("this.data: " + data);
      }, error => {
        console.log("error: " + JSON.stringify(error.json()));
      }
      );
    //var response = this.http.post(productionListURL, body, options).map(res => res['_body']);
    //.catch(this.handleError);
    //console.log(response);
  }

  getProductionList(sessionid) {
    let body = JSON.stringify({ sessionid: sessionid, module: "drylab", args: false, command: "listproductions" });
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    return this.http.post(this._productionListURL, body, options)
      .subscribe(res => {
        let data = res.json();
        console.log("this.data: " + data);
      }, error => {
        console.log("error: " + JSON.stringify(error.json()));
      }
      );

    //     return this.http.post(productionListURL, body, options)
    //       .map(res => {
    //         this.data = res.json();
    //         console.log(this.data);
    //       })
    //       .catch(this.handleError);
  }

  handleError(error) {
    console.error(error);
    return Observable.throw(error.json().error || 'Server error');
  }

}