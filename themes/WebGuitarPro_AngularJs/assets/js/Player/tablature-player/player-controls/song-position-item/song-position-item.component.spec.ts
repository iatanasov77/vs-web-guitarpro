import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SongPositionItemComponent } from './song-position-item.component';

describe('SongPositionItemComponent', () => {
  let component: SongPositionItemComponent;
  let fixture: ComponentFixture<SongPositionItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SongPositionItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SongPositionItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
