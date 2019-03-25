using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Clairierepro
{
    #region Clair_artworks
    public class Clair_artworks
    {
        #region Member Variables
        protected int _idArtWork;
        protected string _title;
        protected string _picture;
        protected string _technicalDescription;
        protected string _optionalDescription;
        protected unknown _date;
        protected int _price;
        protected int _idUser;
        protected int _idWorkStyle;
        protected int _idModality;
        #endregion
        #region Constructors
        public Clair_artworks() { }
        public Clair_artworks(string title, string picture, string technicalDescription, string optionalDescription, unknown date, int price, int idUser, int idWorkStyle, int idModality)
        {
            this._title=title;
            this._picture=picture;
            this._technicalDescription=technicalDescription;
            this._optionalDescription=optionalDescription;
            this._date=date;
            this._price=price;
            this._idUser=idUser;
            this._idWorkStyle=idWorkStyle;
            this._idModality=idModality;
        }
        #endregion
        #region Public Properties
        public virtual int IdArtWork
        {
            get {return _idArtWork;}
            set {_idArtWork=value;}
        }
        public virtual string Title
        {
            get {return _title;}
            set {_title=value;}
        }
        public virtual string Picture
        {
            get {return _picture;}
            set {_picture=value;}
        }
        public virtual string TechnicalDescription
        {
            get {return _technicalDescription;}
            set {_technicalDescription=value;}
        }
        public virtual string OptionalDescription
        {
            get {return _optionalDescription;}
            set {_optionalDescription=value;}
        }
        public virtual unknown Date
        {
            get {return _date;}
            set {_date=value;}
        }
        public virtual int Price
        {
            get {return _price;}
            set {_price=value;}
        }
        public virtual int IdUser
        {
            get {return _idUser;}
            set {_idUser=value;}
        }
        public virtual int IdWorkStyle
        {
            get {return _idWorkStyle;}
            set {_idWorkStyle=value;}
        }
        public virtual int IdModality
        {
            get {return _idModality;}
            set {_idModality=value;}
        }
        #endregion
    }
    #endregion
}