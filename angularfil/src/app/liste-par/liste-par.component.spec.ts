import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeParComponent } from './liste-par.component';

describe('ListeParComponent', () => {
  let component: ListeParComponent;
  let fixture: ComponentFixture<ListeParComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListeParComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListeParComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
